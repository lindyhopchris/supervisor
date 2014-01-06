<?php

namespace Indigo\Supervisor\Section;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupervisorctlSection extends AbstractSection
{
    protected $name = 'supervisorctl';

    public function __construct(array $options = array())
    {
        $this->resolveOptions($options);
    }

    /**
     * {@inheritdoc}
     */
    protected function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'serverurl',
            'username',
            'password',
            'prompt',
            'history_file',
        ))->setAllowedTypes(array(
            'serverurl'    => 'string',
            'username'     => 'string',
            'password'     => 'string',
            'prompt'       => 'string',
            'history_file' => 'string',
        ));
    }
}
