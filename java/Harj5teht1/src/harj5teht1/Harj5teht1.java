/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj5teht1;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj5teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        HashMap <Integer, String>asia = new HashMap<Integer , String>();
        asia.put(1, "jee");
        asia.put(2, "juu");
        asia.put(3, "joo");
        
        String teksti1 = asia.get(1);
        System.out.println(teksti1);
        asia.remove(2);
    }
    
}
