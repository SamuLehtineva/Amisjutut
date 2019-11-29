/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj5teht2;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj5teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        HashMap <Integer, String>asia = new HashMap<Integer , String>();
        asia.put(1, "jee");
        asia.put(2, "juu");
        asia.put(3, "joo");
        asia.put(4, "jyy");
        asia.put(5, "jaa");
        
        Set set = asia.entrySet();
        Iterator i = set.iterator();

        while(i.hasNext()){
        Map.Entry me = (Map.Entry)i.next();
        System.out.println(me.getKey() + " : " + me.getValue() );
        }
    }
    
}
