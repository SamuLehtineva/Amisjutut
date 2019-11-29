/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj3teht5;

/**
 *
 * @author samu.lehtineva
 */
public class Harj3teht5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        String[] taulu1 = {"ma", "ti", "ke", "to", "pe", "la", "su"};
        System.out.println("Anna luku 0 ja 6 väliltä");
        int luku1 = Reader.readInt();
        System.out.println(taulu1[luku1]);
        
    }
    
}
