<?php
declare(strict_types=1);

namespace SuperAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PasswordResetTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('password_reset');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create')

            ->email('email')
            ->notEmptyString('email', __('Enter your email address'))

            ->notEmptyString('token', __('Token is not present'))

            ->requirePresence('status')
            ->notEmpty('status', 'Status is not present.')
            ->add('status', [
                    'numeric'=>[
                        'message' => 'Status is not present.'
                    ]
                ]);

        return $validator;
    }

}
