Feature: Cocktail Ordering

  As Romeo, I want to offer a drink to Juliette so that we can discuss together (and maybe more).

  Scenario: Creating a custom order
    Given {string} who wants to buy a drink
    When an order is declared for {string}
    Then there are {int} cocktails in the order
