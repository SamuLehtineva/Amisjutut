/*
 * 10.1.2019
 * Samu Lehtineva
 */
package javaharj3;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //
        
        System.out.println("Anna rahamäärä:");
        double rahamaara = Reader.readDouble();
        
        double hinta = 3;
        double bensa = rahamaara / hinta;
        double roundoff = Math.round(bensa * 100.0) / 100.0;
        System.out.println("Saat " + roundoff);
    }
    
}
