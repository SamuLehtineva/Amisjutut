/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj2teht4;

/**
 *
 * @author samu.lehtineva
 */
public class Harj2teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        int luku = 7;
        
        boolean ok = true;
        while(ok) {
            
            if(luku>=1 && luku<=5) {
                ok = false;
            } else {
                ok = true;
                 System.out.println("Valiste luku 1 ja 5 väliltä");
                 luku = Reader.readInt();
            }
        }
        
        
    }
    
}
