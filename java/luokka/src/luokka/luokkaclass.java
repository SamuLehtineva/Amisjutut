/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package luokka;

/**
 *
 * @author samu.lehtineva
 */
public class luokkaclass extends korko {
    private double saldo;
    private String omistaja;
    
    public luokkaclass(String omistaja, double saldo) {
        super(1.5);
        this.saldo = saldo;
        this.omistaja = omistaja;
        System.out.println("Omistaja " + this.omistaja + " Ja saldo: " + this.saldo);
    }
    
    public void pano(double maara) {
        this.saldo += maara;
    }
    
    public void otto(double maara) {
        this.saldo -= maara;
    }
    
    public double saldo() {
        return this.saldo;
    }
   @Override 
   public String toString() {
       return this.omistaja + " saldo: " + this.saldo;
   }
}
