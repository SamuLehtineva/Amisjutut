/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht9;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht9 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        HashMap <Integer, String>asia = new HashMap<Integer , String>();
        asia.put(1, "Mersu");
        asia.put(2, "Lada");
        asia.put(3, "Audi");
        asia.put(4, "Renault");
        
        Set set = asia.entrySet();
        Iterator i = set.iterator();
        String teksti1 = asia.get(2);
        System.out.println(teksti1);
        
        asia.remove(4);
        
        for (int a = 0; a < asia.size(); a++) {
            System.out.println(asia.get(a));
        }
        
    }
    
}
