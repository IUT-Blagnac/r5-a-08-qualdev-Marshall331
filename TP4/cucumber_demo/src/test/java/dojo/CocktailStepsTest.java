package dojo;

import java.util.List;

import static org.junit.Assert.assertEquals;

import cucumber.api.java.en.Given;
import cucumber.api.java.en.Then;
import cucumber.api.java.en.When;
import dojo.Model.Order;

public class CocktailStepsTest {
    private Order order;

    @Given("{string} who wants to buy a drink")
    public void person_who_wants_to_buy_a_drink(String from) {
        order = new Order();
        order.declareOwner(from);
    }

    @When("an order is declared for {string}")
    public void an_order_is_declared_for(String to) {
        order.declareTarget(to);
    }

    @Then("there is {int} cocktails in the order")
    public void there_are_cocktails_in_the_order(int nbCocktails) {
        order.addCocktails(nbCocktails);

        List<String> cocktails = order.getCocktails();
        assertEquals(nbCocktails, cocktails.size());
    }

    @When("a message saying {string} is added")
    public void a_message_saying_is_added(String message) {
        order.setDeliverMessage(message);
    }

    @Then("the ticket must say {string}")
    public void the_ticket_must_say(String expected) {
        assertEquals(expected, order.getDeliverMessage());
    }
}
