/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj2teht3;

/**
 *
 * @author samu.lehtineva
 */
public class Harj2teht3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna luku ja kone antaa sitä seuraavat kymmenen lukua");
        int luku = Reader.readInt();
        
        int luku2 = 0;
        while(luku2 <= 10) {
            System.out.println(luku);
            luku++;
            luku2++;
        }
    }
    
}
