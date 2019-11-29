/*
 * 10.1.2019
 * Samu Lehtineva
 */
package javaharj2;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        System.out.println("Anna jokin säde:");
        double luku = Reader.readDouble();
        
        double ala = Math.PI * luku * luku;
        ala = Math.round(ala);
        System.out.println("ala on:" + ala);
        //laske ala
        //tulosta ala
        /**
        System.out.println("Anna jokin säde:");
        float floatLuku = Reader.readFloat();
        float pi2 = Math.PI;
        float ala2 = Float.parseFloat();
        System.out.println("ala on:" + floatLuku);
        //laske ala
        //tulosta ala
    /*
     * Pyydä käyttäjältä säde
     * Laske ala = pii x säde x säde
     * Tulosta ala
     */
    }
    
}
