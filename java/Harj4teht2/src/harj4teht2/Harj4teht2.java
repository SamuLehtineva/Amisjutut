/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj4teht2;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj4teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<Integer> lista = new ArrayList<Integer>();
        
        while(true) {
            System.out.println("Anna luku tai -1 laskeaksesi annettujen lukujen keskiarvon");
            int luku1 = Reader.readInt();
            
            if(luku1 == -1) {
                break;
            }
            lista.add(luku1);
        }
        int luku2 = lista.size();
        double luku3 = 0;
        int i =0;
        
        while(i<luku2) {
            luku3 = luku3 + lista.get(i);
            i++;
        }
        luku3 = luku3/ lista.size();
        System.out.println("Keskiarvo on: " + luku3);
    }
    
}
