/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj6teht3;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj6teht3 {

    /**
     * @param args the command line arguments
     */
    private static int aliohjelma(int a, int b) {
        int f = (int)(Math.random() * ((b - a) +1) + a);
        System.out.println(f);
    return(a-b);
}
    public static void main(String[] args) {
        int c = aliohjelma(1, 10);
    }
    
}
