/*
 * 11.1.2019
 * Samu Lehtineva
 */
package harj2teht1;

/**
 *
 * @author samu.lehtineva
 */
public class Harj2teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int asia = 1;
        //tulostaa random luvun ja kasvatta asiaa yhdellä kunnes asia on 100
        while (asia < 100) {
            System.out.println(Math.random());
            asia++;
        }
    }
    
}
