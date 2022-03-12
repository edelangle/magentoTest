<?php

    namespace Formation\Formation_TP1\Console\Command;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;

    /**
     * Class TestCommand
     */
    class TestCommand extends Command
    {
    
        /**
         * @inheritDoc
         */
        protected function configure()
        {
            $this->setName('test:premiere:command');
            $this->setDescription('Tentative de création d\'une commande.');
            parent::configure();
        }

        /**
         * Execution de la commande
         *
         * @param InputInterface $input
         * @param OutputInterface $output
         *
         * @return null|int
         */
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $output->writeln('<info>Ca marche !</info>');
        }
    }