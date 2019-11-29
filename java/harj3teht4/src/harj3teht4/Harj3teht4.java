/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj3teht4;

/**
 *
 * @author samu.lehtineva
 */
public class Harj3teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int[] taulukko1 = new int[5];
        int luku1 = 0;
        
        while(luku1 < taulukko1.length) {
            System.out.println("Anna luku: ");
            int luku2 = Reader.readInt();
            taulukko1[luku1] = luku2;
            luku1++;
        }
        System.out.println("Indeksin 1 arvo on: " + taulukko1[0]);
        System.out.println("Indeksin 2 arvo on: " + taulukko1[1]);
        System.out.println("Indeksin 3 arvo on: " + taulukko1[2]);
        System.out.println("Indeksin 4 arvo on: " + taulukko1[3]);
        System.out.println("Indeksin 5 arvo on: " + taulukko1[4]);
        
    }
    
}
