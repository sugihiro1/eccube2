<?php
namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20160805000000 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->createPluginTable($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('plg_zaif_payment');
    }

    protected function createPluginTable(Schema $schema)
    {
        $table = $schema->createTable('plg_zaif_payment');
        $table->addColumn('mainkey','string',array('length'=>'255', 'notnull'=>true));
        $table->addColumn('subkey','string',array('length'=>'255', 'notnull'=>true));
        $table->addColumn('value','text',array('notnull'=>true));
        $table->setPrimaryKey(array('mainkey','subkey'));
    }
}
