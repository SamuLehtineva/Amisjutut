/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht2;

/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna tuumia");
        int tuuma = Reader.readInt();
        double sentti = tuuma * 2.54;
        System.out.println(sentti + "cm");
    }
    
}
