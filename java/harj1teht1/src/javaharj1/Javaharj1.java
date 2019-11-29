/*
 * 7.1.2019
 * Samu Lehtineva
 */
package javaharj1;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        // esimerkki Lukijan käytöstä:
        int luku;
        // luetaan luku käyttäjältä
        System.out.println("annoit luvun");
        luku = Reader.readInt();
        System.out.println("annoit luvun " + luku);
    }
    
}
