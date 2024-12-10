package dojo;

import org.junit.runner.RunWith;

import cucumber.api.CucumberOptions;
import cucumber.api.junit.Cucumber;

@RunWith(Cucumber.class)
@CucumberOptions(
    features = "src/main/ressources/dojo", // Dossier contenant le fichier .feature
    glue = "dojo")
public class RunCucumberTest {
}
