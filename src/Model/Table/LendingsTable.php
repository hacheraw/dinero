<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Automation;
use App\Model\Entity\Lending;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lendings Model
 *
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\Lending newEmptyEntity()
 * @method \App\Model\Entity\Lending newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lending[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lending get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lending findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lending patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lending[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lending|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lending saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lending[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LendingsTable extends Table
{
    public const TYPES = [
        Lending::DEBT => 'Debt',
        Lending::PAYMENT => 'Payment',
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('lendings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('person_id')
            ->requirePresence('person_id', 'create')
            ->notEmptyString('person_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('type')
            ->maxLength('type', 16)
            ->notEmptyString('type');

        $validator
            ->boolean('automatic')
            ->notEmptyString('automatic');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('person_id', 'People'), ['errorField' => 'person_id']);

        return $rules;
    }

    /**
     * Generates a new Lending entity using an Automation entity.
     *
     * @param Automation $automation Entity to generate the Lending from.
     * @return Lending|false Lending entity or false if the entity could not be generated.
     */
    public function generate(Automation $automation): Lending|false
    {
        $lending = $this->newEmptyEntity();
        $lending->person_id = $automation->person_id;
        $lending->name = $automation->name;
        $lending->amount = $automation->amount;
        $lending->type = Lending::DEBT;
        $lending->automatic = true;

        return $this->save($lending);
    }
}
