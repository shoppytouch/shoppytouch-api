<?php

namespace Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171030030252 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shop (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', address_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', owner_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, INDEX IDX_AC6A4CA2F5B7AF75 (address_id), INDEX IDX_AC6A4CA27E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_has_employee (shop_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', employee_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_519CE8074D16C4DD (shop_id), INDEX IDX_519CE8078C03F15C (employee_id), PRIMARY KEY(shop_id, employee_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_has_manager (shop_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', manager_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_4FA2BB724D16C4DD (shop_id), INDEX IDX_4FA2BB72783E3463 (manager_id), PRIMARY KEY(shop_id, manager_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', address_line_1 VARCHAR(255) NOT NULL, address_line_2 VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, country_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_clothing (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_owner (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', user_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', reference VARCHAR(255) NOT NULL, consumed TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_62A8A7A7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', brand_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, sky VARCHAR(255) NOT NULL, ean13 VARCHAR(255) NOT NULL, price INT NOT NULL, vat NUMERIC(2, 5) NOT NULL, string VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT \'1\' NOT NULL COMMENT \'Is the product active\', created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D34A04AD62674EF (sky), UNIQUE INDEX UNIQ_D34A04AD2FAE1FC8 (ean13), INDEX IDX_D34A04AD44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_wine (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_manager (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', first_name VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, dob DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_employee (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_shoes (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA2F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA27E3C61F9 FOREIGN KEY (owner_id) REFERENCES user_owner (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE shop_has_employee ADD CONSTRAINT FK_519CE8074D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE shop_has_employee ADD CONSTRAINT FK_519CE8078C03F15C FOREIGN KEY (employee_id) REFERENCES user_employee (id)');
        $this->addSql('ALTER TABLE shop_has_manager ADD CONSTRAINT FK_4FA2BB724D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE shop_has_manager ADD CONSTRAINT FK_4FA2BB72783E3463 FOREIGN KEY (manager_id) REFERENCES user_manager (id)');
        $this->addSql('ALTER TABLE product_clothing ADD CONSTRAINT FK_D82C5226BF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_owner ADD CONSTRAINT FK_2DA21D24BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_wine ADD CONSTRAINT FK_DBE446C9BF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_manager ADD CONSTRAINT FK_A2293BB3BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_employee ADD CONSTRAINT FK_BD1291A1BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_shoes ADD CONSTRAINT FK_B593FACBBF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_has_employee DROP FOREIGN KEY FK_519CE8074D16C4DD');
        $this->addSql('ALTER TABLE shop_has_manager DROP FOREIGN KEY FK_4FA2BB724D16C4DD');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA2F5B7AF75');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA27E3C61F9');
        $this->addSql('ALTER TABLE product_clothing DROP FOREIGN KEY FK_D82C5226BF396750');
        $this->addSql('ALTER TABLE product_wine DROP FOREIGN KEY FK_DBE446C9BF396750');
        $this->addSql('ALTER TABLE product_shoes DROP FOREIGN KEY FK_B593FACBBF396750');
        $this->addSql('ALTER TABLE shop_has_manager DROP FOREIGN KEY FK_4FA2BB72783E3463');
        $this->addSql('ALTER TABLE user_owner DROP FOREIGN KEY FK_2DA21D24BF396750');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7A76ED395');
        $this->addSql('ALTER TABLE user_manager DROP FOREIGN KEY FK_A2293BB3BF396750');
        $this->addSql('ALTER TABLE user_employee DROP FOREIGN KEY FK_BD1291A1BF396750');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE shop_has_employee DROP FOREIGN KEY FK_519CE8078C03F15C');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE shop_has_employee');
        $this->addSql('DROP TABLE shop_has_manager');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE product_clothing');
        $this->addSql('DROP TABLE user_owner');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_wine');
        $this->addSql('DROP TABLE user_manager');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE user_employee');
        $this->addSql('DROP TABLE product_shoes');
    }
}
