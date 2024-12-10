package hellocucumber;

import static org.junit.jupiter.api.Assertions.assertEquals;

import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import io.cucumber.java.en.When;

public class StepDefinitions {

    static class IsItFriday {
        static String isItFriday(String today) {
            return "Friday".equals(today) ? "TGIF" : "Nope";
        }
    }

    private String today;
    private String answer;

    @Given("today is {string}")
    public void today_is(String string) {
        // Write code here that turns the phrase above into concrete actions
       today = string;
    }

    @Given("today is Sunday")
    public void today_is_sunday() {
        // Cette étape initialise la variable 'today' à "Sunday"
        today = "Sunday";
    }

    @When("I ask whether it's Friday yet")
    public void i_ask_whether_it_s_friday_yet() {
        // Cette étape appelle la méthode 'isItFriday' pour vérifier si c'est vendredi
        answer = IsItFriday.isItFriday(today);
    }

    @Then("I should be told {string}")
    public void i_should_be_told(String expectedAnswer) {
        // Cette étape compare la réponse retournée par 'isItFriday' avec la réponse attendue
        assertEquals(expectedAnswer, answer);
    }

    @Given("today is Friday")
    public void today_is_friday() {
        // Cette étape initialise la variable 'today' à "Friday"
        today = "Friday";
    }
}