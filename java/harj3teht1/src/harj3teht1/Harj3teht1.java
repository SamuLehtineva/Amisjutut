/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj3teht1;
import java.util.concurrent.ThreadLocalRandom;
/**
 *
 * @author samu.lehtineva
 */
public class Harj3teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int[] taulukko1 = new int[20];
        int i = 0;
        while (i < taulukko1.length) {
            int random1 = ThreadLocalRandom.current().nextInt(1, 10 + 1);
            taulukko1[i] = random1;
            i++;
        }
        int luku1 = 0;
        while (luku1 < taulukko1.length) {
            System.out.println("indeksillä " + luku1 + " on arvo " + taulukko1[luku1]);
            luku1++;
        }
        
    }
    
}
