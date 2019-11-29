/*
 * 10.1.2019
 * Samu Lehtineva
 */
package javaharj4;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        System.out.println("Anna luku:");
        double luku = Reader.readDouble();
        
        if (luku > 0) {
            System.out.println("Luku on positiivinen");
        } else if (luku < 0) {
            System.out.println("Luku on negatiivinen");
        } else {
            System.out.println("Luku on 0");
        }
        
    }
    
}
