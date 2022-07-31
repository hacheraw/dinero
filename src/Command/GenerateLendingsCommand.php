<?php

declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use DateTime;

/**
 * GenerateLendings command.
 */
class GenerateLendingsCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $this->Automations = $this->fetchTable('Automations');
        $this->Lendings = $this->fetchTable('Lendings');

        $automations = $this->Automations->find()->where(['active' => true]);
        foreach ($automations as $automation) {
            $now = new DateTime(date('Y-m-d H:i:00'));
            if ($automation->is_due && $automation->aplied_on != $now) {
                // Si justo debe aplicarse en este minuto y no se ha aplicado ya
                $this->log("{$automation->name} is due", 'info');
                $this->__generate($automation, $now);
            } else if (is_null($automation->aplied_on) && $automation->created < $automation->previous_run_date) {
                // Si nunca se ha ejecutado y debía haberse ejecutado después de la fecha de creación
                $this->log("{$automation->name} must be executed for the first time", 'info');
                $this->__generate($automation, $now);
            } else if (!is_null($automation->aplied_on) && $automation->aplied_on < $automation->previous_run_date) {
                // O si debió haberse ejecutado después de la última ejecución
                $this->log("{$automation->name} must be executed again", 'info');
                $this->__generate($automation, $now);
            } else {
                $this->log("Skipping {$automation->name} until {$automation->next_run_date->format('Y-m-d H:i:s')}", 'info');
            }
        }
    }

    private function __generate($automation, $now)
    {
        if (!$this->Lendings->generate($automation)) {
            $this->log("Lending generation for {$automation->name} failed", 'error');
        } else {
            $this->log("{$automation->name} generated", 'info');
            $automation->aplied_on = $now->format('Y-m-d H:i:s');
            if (!$this->Automations->save($automation)) {
                $errors = json_encode($automation->getErrors());
                $this->log("{$automation->name} aplied_on could not be updated - {$errors}", 'error');
            }
        }
    }
}
