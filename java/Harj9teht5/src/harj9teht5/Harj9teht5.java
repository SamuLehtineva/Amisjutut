/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht5;

/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        boolean ok = true;
        int tulos = 0;
        while(ok) {
            System.out.println("Anna luku tai 0 jos haluat lopettaa");
            int luku = Reader.readInt();
            
            if (luku == 0) {
                ok = false;
                
            } else {
                tulos = tulos + luku;
            }
        }
        System.out.println("Lukusi yhteenlaskettuna ovat: "+tulos);
    }
    
}
