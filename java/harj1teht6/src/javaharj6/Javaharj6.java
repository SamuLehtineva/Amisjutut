/*
 * 10.1.2019
 * Samu Lehtineva
 */
package javaharj6;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj6 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna ikäsi:");
        int ika = Reader.readInt();
        
        System.out.println("Anna kuukausi palkkasi:");
        int palkka = Reader.readInt();
        
        if (ika > 40 && palkka > 20000) {
            System.out.println("Rikas vanhus");
        } else if (ika > 40 && palkka < 20000) {
            System.out.println("Köyhä rahjus");
        } else if (ika < 40) {
            System.out.println("Rahalla ei ole väliä");
        }
        
    }
    
}
