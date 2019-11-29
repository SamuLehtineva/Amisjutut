/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj3teht2;

/**
 *
 * @author samu.lehtineva
 */
public class Harj3teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int[] taulukko1 = new int[3];
        int[] taulukko2;
        
        taulukko1[0] = 3;
        taulukko1[1] = 33;
        taulukko1[2] = 35;
                
        System.out.println("Ensimmäisen taulukon Pituus: " + taulukko1.length + " Indeksi 2 arvo: " + taulukko1[2]);
        
        taulukko2 = taulukko1.clone();
        System.out.println("Toisen taulukon Pituus: " + taulukko2.length + " Indeksi 2 arvo: " + taulukko2[2]);
        //samalta näyttää
        taulukko1[2] = 305;
        System.out.println("Ensimmäisen taulukon Pituus: " + taulukko1.length + " Indeksi 2 arvo: " + taulukko1[2]);
        System.out.println("Toisen taulukon Pituus: " + taulukko2.length + " Indeksi 2 arvo: " + taulukko2[2]);
    }
    
}
