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
public class korko {
    private double korko;
    
    public korko(double korkoprosentti) {
        this.korko = korkoprosentti;
    }
    
    public double laskekorko(double saldo){
        return saldo * korko;
    }
}
