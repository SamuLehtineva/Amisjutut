/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javahrj1.pkg9;

/**
 *
 * @author samu.lehtineva
 */
public class Javahrj19 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna luku");
        double luku1 = Reader.readDouble();
        System.out.println("Anna toinen luku");
        double luku2 = Reader.readDouble();
        
        String ohje = "\nPlus\t(1)\nMiinus\t(2)\nJako\t(3)\nKerto\t(4)\n";
        System.out.println(ohje);
        
        System.out.println("Valitse");
        int juttu = Reader.readInt();
        
        if (juttu == 1) {
            double vastaus = luku1 + luku2;
            System.out.println(vastaus);
        } else if (juttu == 2) {
            double vastaus = luku1 - luku2;
            System.out.println(vastaus);
        } else if (juttu == 3) {
            double vastaus = luku1 / luku2;
            System.out.println(vastaus);
        } else if (juttu == 4) {
            double vastaus = luku1 * luku2;
            System.out.println(vastaus);
        }
        
        
        // \n uusi
    }
    
}
