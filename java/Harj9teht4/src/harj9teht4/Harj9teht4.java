/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht4;
import java.util.Arrays;
import java.util.concurrent.ThreadLocalRandom;
/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Montako lukua haluat arvottavan");
        int luku1 = Reader.readInt();
        int[] taulukko1 = new int[luku1];
        int x = 0;
        while (x < taulukko1.length) {
            int random1 = ThreadLocalRandom.current().nextInt(1, 100 + 1);
            taulukko1[x] = random1;
            x++;
        }
        Arrays.sort(taulukko1);
        for(int i = 0; i < taulukko1.length; i++) {
            System.out.println(taulukko1[i]);
        }
        
    }
    
}
