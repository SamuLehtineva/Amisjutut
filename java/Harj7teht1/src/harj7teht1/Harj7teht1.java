/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj7teht1;

/**
 *
 * @author samu.lehtineva
 * @author - Tämä generoituu NetBeansissa kun luo luokan.
    @version 1.0
 */
public class Harj7teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Mikä on Pirkanmaan suurin kaupunki");
        //Alla oleva ottaa syötetyn tekstin ja pistää sen upper caseen
        String teksti1 = Reader.readString().toUpperCase();
        if(teksti1.equals("TAMPERE")) {
            System.out.println("Oikein");
        } else {
            System.out.println("Väärin");
        }
    }
    
}
