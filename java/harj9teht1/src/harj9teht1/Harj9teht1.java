/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht1;

/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna vuosiluku");
        int vuosi = Reader.readInt();
        boolean ok = (((vuosi%4==0) && (vuosi%100==0)) || (vuosi%400==0));
        if(ok) {
            System.out.println("Vuosi on karkausvuosi");
        } else {
            System.out.println("Vuosi ei ole karkausvuosi");
        }
    }
    
}
