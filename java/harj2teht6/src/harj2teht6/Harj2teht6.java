/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj2teht6;

/**
 *
 * @author samu.lehtineva
 */
public class Harj2teht6 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int luku1 = 1;
        int luku2 = 0;
        while(luku1 <= 10) {
            System.out.print(luku1+" ");
            luku2 = luku2 + luku1;
            System.out.println(luku2);
            
            luku1++;
        }
    }
    
}
