<?php

use Behat\Behat\Context\Context;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $connection;
    private $nbUsers = 0;
    private $nbAddresses = 0;
    private $nbProfiles = 0;
    private $nbCategories = 0;
    private $nbArticles = 0;

    /**
     * Initializes context.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->connection = $entityManager->getConnection();
    }

    /**
     * @Given the database is reset and fixtures are loaded
     */
    public function theDatabaseIsResetAndFixturesAreLoaded(): void
    {
        exec('php bin/console doctrine:fixtures:load --no-interaction');
    }

    /**
     * @When I retrieve all users
     */
    public function iRetrieveAllUsers(): void
    {
        $sql = 'SELECT COUNT(*) as total FROM user';
        $result = $this->connection->fetchAssociative($sql);
        $this->nbUsers = $result['total'];
    }

    /**
     * @Then there should be :arg1 users in the database
     */
    public function thereShouldBeUsersInTheDatabase($arg1): void
    {
        if ($this->nbUsers !== (int) $arg1) {
            throw new \Exception("Expected $arg1 users, but found $this->nbUsers.");
        }
    }

    /**
     * @When I retrieve all addresses
     */
    public function iRetrieveAllAddresses(): void
    {
        $sql = 'SELECT COUNT(*) as total FROM address';
        $result = $this->connection->fetchAssociative($sql);
        $this->nbAddresses = $result['total'];
    }

    /**
     * @Then there should be :arg1 addresses in the database
     */
    public function thereShouldBeAddressesInTheDatabase($arg1): void
    {
        if ($this->nbAddresses !== (int) $arg1) {
            throw new \Exception("Expected $arg1 addresses, but found $this->nbAddresses.");
        }
    }

    /**
     * @When I retrieve all profiles
     */
    public function iRetrieveAllProfiles(): void
    {
        $sql = 'SELECT COUNT(*) as total FROM profile';
        $result = $this->connection->fetchAssociative($sql);
        $this->nbProfiles = $result['total'];
    }

    /**
     * @Then there should be :arg1 profiles in the database
     */
    public function thereShouldBeProfilesInTheDatabase($arg1): void
    {
        if ($this->nbProfiles !== (int) $arg1) {
            throw new \Exception("Expected $arg1 profiles, but found $this->nbProfiles.");
        }
    }

    /**
     * @When I retrieve all categories
     */
    public function iRetrieveAllCategories(): void
    {
        $sql = 'SELECT COUNT(*) as total FROM category';
        $result = $this->connection->fetchAssociative($sql);
        $this->nbCategories = $result['total'];
    }

    /**
     * @Then there should be :arg1 categories in the database
     */
    public function thereShouldBeCategoriesInTheDatabase($arg1): void
    {
        if ($this->nbCategories !== (int) $arg1) {
            throw new \Exception("Expected $arg1 categories, but found $this->nbCategories.");
        }
    }

    /**
     * @When I retrieve all articles
     */
    public function iRetrieveAllArticles(): void
    {
        $sql = 'SELECT COUNT(*) as total FROM article';
        $result = $this->connection->fetchAssociative($sql);
        $this->nbArticles = $result['total'];
    }

    /**
     * @Then there should be :arg1 articles in the database
     */
    public function thereShouldBeArticlesInTheDatabase($arg1): void
    {
        if ($this->nbArticles !== (int) $arg1) {
            throw new \Exception("Expected $arg1 articles, but found $this->nbArticles.");
        }
    }

    /**
     * @Then each article should have at least one category
     */
    public function eachArticleShouldHaveAtLeastOneCategory(): void
    {
        $sql = 'SELECT a.id FROM article a LEFT JOIN article_category ac ON a.id = ac.article_id WHERE ac.category_id IS NULL';
        $result = $this->connection->fetchAllAssociative($sql);

        if (count($result) > 0) {
            $ids = implode(', ', array_column($result, 'id'));
            throw new \Exception("Articles with IDs $ids do not have any categories.");
        }
    }

    /**
     * @Then each article should be linked to a user
     */
    public function eachArticleShouldBeLinkedToAUser(): void
    {
        $sql = 'SELECT id FROM article WHERE user_id IS NULL';
        $result = $this->connection->fetchAllAssociative($sql);

        if (count($result) > 0) {
            $ids = implode(', ', array_column($result, 'id'));
            throw new \Exception("Articles with IDs $ids are not linked to a user.");
        }
    }
}
