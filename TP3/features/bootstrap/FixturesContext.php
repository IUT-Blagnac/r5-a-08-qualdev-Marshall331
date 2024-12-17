<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Address;
use App\Entity\Profile;
use App\Entity\Category;
use App\Entity\Article;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $entityManager;
    private $nbUsers = 0;
    private $nbAddresses = 0;
    private $nbProfiles = 0;
    private $nbCategories = 0;
    private $nbArticles = 0;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(
        // EntityManagerInterface $entityManager
        ) {
        // $this->entityManager = $entityManager;
    }

    /**
     * @Given the database is reset and fixtures are loaded
     */
    public function theDatabaseIsResetAndFixturesAreLoaded(): void
    {
        // exec('php bin/console doctrine:fixtures:load --no-interaction');
    }

    /**
     * @When I retrieve all users
     */
    public function iRetrieveAllUsers(): void
    {
        // $this->nbUsers = count($this->entityManager->getRepository(User::class)->findAll());
    }

    /**
     * @Then there should be :arg1 users in the database
     */
    public function thereShouldBeUsersInTheDatabase($arg1): void
    {
        // if ($this->nbUsers !== (int) $arg1) {
        //     throw new \Exception("Expected $arg1 users, but found $this->nbUsers.");
        // }
    }

    /**
     * @When I retrieve all addresses
     */
    public function iRetrieveAllAddresses(): void
    {
        // $this->nbAddresses = count($this->entityManager->getRepository(Address::class)->findAll());
    }

    /**
     * @Then there should be :arg1 addresses in the database
     */
    public function thereShouldBeAddressesInTheDatabase($arg1): void
    {
        // if ($this->nbAddresses !== (int) $arg1) {
        //     throw new \Exception("Expected $arg1 addresses, but found $this->nbAddresses.");
        // }
    }

    /**
     * @When I retrieve all profiles
     */
    public function iRetrieveAllProfiles(): void
    {
        // $this->nbProfiles = count($this->entityManager->getRepository(Profile::class)->findAll());
    }

    /**
     * @Then there should be :arg1 profiles in the database
     */
    public function thereShouldBeProfilesInTheDatabase($arg1): void
    {
        // if ($this->nbProfiles !== (int) $arg1) {
        //     throw new \Exception("Expected $arg1 profiles, but found $this->nbProfiles.");
        // }
    }

    /**
     * @When I retrieve all categories
     */
    public function iRetrieveAllCategories(): void
    {
        // $this->nbCategories = count($this->entityManager->getRepository(Category::class)->findAll());
    }

    /**
     * @Then there should be :arg1 categories in the database
     */
    public function thereShouldBeCategoriesInTheDatabase($arg1): void
    {
        // if ($this->nbCategories !== (int) $arg1) {
        //     throw new \Exception("Expected $arg1 categories, but found $this->nbCategories.");
        // }
    }

    /**
     * @When I retrieve all articles
     */
    public function iRetrieveAllArticles(): void
    {
        // $this->nbArticles = count($this->entityManager->getRepository(Article::class)->findAll());
    }

    /**
     * @Then there should be :arg1 articles in the database
     */
    public function thereShouldBeArticlesInTheDatabase($arg1): void
    {
        // if ($this->nbArticles !== (int) $arg1) {
        //     throw new \Exception("Expected $arg1 articles, but found $this->nbArticles.");
        // }
    }

    /**
     * @Then each article should have at least one category
     */
    public function eachArticleShouldHaveAtLeastOneCategory(): void
    {
        // $articles = $this->entityManager->getRepository(Article::class)->findAll();

        // foreach ($articles as $article) {
        //     if ($article->getCategories()->isEmpty()) {
        //         throw new \Exception("Article ID {$article->getId()} does not have any categories.");
        //     }
        // }
    }

    /**
     * @Then each article should be linked to a user
     */
    public function eachArticleShouldBeLinkedToAUser(): void
    {
        // $articles = $this->entityManager->getRepository(Article::class)->findAll();

        // foreach ($articles as $article) {
        //     if ($article->getUser() === null) {
        //         throw new \Exception("Article ID {$article->getId()} is not linked to a user.");
        //     }
        // }
    }
}
