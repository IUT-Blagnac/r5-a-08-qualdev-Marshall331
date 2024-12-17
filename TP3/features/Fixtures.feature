Feature: Blog Fixtures Data
  In order to verify the correct generation of data
  As a developer I want to test that the fixtures generate the expected data.

  Background:
    Given the database is reset and fixtures are loaded

  Scenario: Ensure 30 users are created
    When I retrieve all users
    Then there should be 30 users in the database

  Scenario: Ensure 30 addresses are created
    When I retrieve all addresses
    Then there should be 30 addresses in the database

  Scenario: Ensure 30 profiles are created
    When I retrieve all profiles
    Then there should be 30 profiles in the database

  Scenario: Ensure 30 categories are created
    When I retrieve all categories
    Then there should be 30 categories in the database

  Scenario: Ensure 100 articles are created
    When I retrieve all articles
    Then there should be 100 articles in the database