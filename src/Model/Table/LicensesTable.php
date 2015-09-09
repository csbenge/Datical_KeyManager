<?php
namespace App\Model\Table;

use App\Model\Entity\License;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Licenses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class LicensesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('licenses');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('consumerAmount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('consumerAmount');

        $validator
            ->allowEmpty('consumerType');

        $validator
            ->allowEmpty('issuer');

        $validator
            ->allowEmpty('subject');

        $validator
            ->allowEmpty('holder');

        $validator
            ->add('notAfter', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('notAfter');

        $validator
            ->allowEmpty('info');

        $validator
            ->allowEmpty('companyName');

        $validator
            ->allowEmpty('contactName');

        $validator
            ->allowEmpty('contactEmail');

        $validator
            ->allowEmpty('jsonLicense');

        $validator
            ->allowEmpty('binLicense');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
