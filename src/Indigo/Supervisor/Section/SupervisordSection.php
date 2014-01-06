<?php

namespace Indigo\Supervisor\Section;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupervisordSection extends AbstractSection
{
    protected $name = 'supervisord';

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
            'logfile',
            'logfile_maxbytes',
            'logfile_backups',
            'loglevel',
            'pidfile',
            'umask',
            'nodaemon',
            'minfds',
            'minprocs',
            'nocleanup',
            'childlogdir',
            'user',
            'directory',
            'strip_ansi',
            'environment',
            'identifier',
        ))->setAllowedTypes(array(
            'logfile'          => 'string',
            'logfile_maxbytes' => array('integer', 'string'),
            'logfile_backups'  => 'integer',
            'loglevel'         => 'string',
            'pidfile'          => 'string',
            'umask'            => 'integer',
            'nodaemon'         => 'bool',
            'minfds'           => 'integer',
            'minprocs'         => 'integer',
            'nocleanup'        => 'bool',
            'childlogdir'      => 'string',
            'user'             => 'string',
            'directory'        => 'string',
            'strip_ansi'       => 'bool',
            'environment'      => 'array',
            'identifier'       => 'string',
        ))->setAllowedTypes(array(
            'loglevel' => array('critical', 'error', 'warn', 'info', 'debug', 'trace', 'blather'),
        ))->setNormalizers(array(
            'environment' => function (Options $options, $value) {
                foreach ($value as $key => $val) {
                    $value[$key] .= strtoupper($key) . '="' . $val . '"';
                }

                return implode(',', $value);
            },
        ));
    }
}
