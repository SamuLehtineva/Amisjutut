/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj7teht5;

/**
 *
 * @author samu.lehtineva
 */
public class Harj7teht5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Syötä eläinten nimiä, erota pilkulla:");
        String asia1 = Reader.readString();
        String[] asia2 = asia1.split(",");
        int luku1 = 0;
        while (luku1 < asia2.length) {
            System.out.println(luku1 + "  " + asia2[luku1]);
            luku1++;
        }
    }
    
}
