package dojo.Model;

import java.util.ArrayList;
import java.util.List;

public class Order {

    private String owner = "";
    private String target = "";

    private String deliverMessage = "";

    private List<String> cocktails = new ArrayList<>();

    public void declareOwner(String _owner) {
        this.owner = _owner;
    }

    public String getOwner() {
        return this.owner;
    }

    public void declareTarget(String _target) {
        this.target = _target;
    }

    public String getTarget() {
        return this.target;
    }

    public List<String> getCocktails() {
        return this.cocktails;
    }

    public void addCocktails(int expectedCocktailCount) {
        for (int i = 0; i < expectedCocktailCount; i++) {
            this.cocktails.add("cocktails");
        }
    }

    public void setDeliverMessage(String message) {
        this.deliverMessage ="From " +  this.owner + " " + "to " + this.target + ": " + message;
    }

    public String getDeliverMessage(){
        return this.deliverMessage;
    }
}
