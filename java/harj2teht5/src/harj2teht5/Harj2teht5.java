/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj2teht5;

/**
 *
 * @author samu.lehtineva
 */
public class Harj2teht5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        boolean ok = true;
        int tulos = 0;
        while(ok) {
            System.out.println("Anna luku");
            int luku = Reader.readInt();
            
            if (luku == -1) {
                ok = false;
                
            } else {
                tulos = tulos + luku;
            }
        }
        System.out.println(tulos);
    }
    
}
