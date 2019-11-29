/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht3;

/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int luku1 = 2;
        while(luku1<100) {
            if(luku1%2==0) {
                System.out.print(luku1+",");
            }
            luku1++;
        }
        System.out.println("");
        int luku2 = 0;
        while(luku2<100) {
            if(luku2%3==0 || luku2%5==0) {
                System.out.print(luku2+",");
            }
            luku2++;
        }
       System.out.println("");
       int luku3 = 0;
       int luku4 = 0;
       while(luku3<96) {
           System.out.print(luku3+",");
           if(luku4<5) {
               luku3++;
               luku4++;
           } else {
               luku3 = luku3 + 5;
               luku4 = 0;
           }
       }
       System.out.println("");
       int luku5 = 1;
       int luku6 = 10;
       int luku7 = 1;
       int luku8 = 0;
       while (luku8 <=9) {
           System.out.print(luku5+",");
           luku5 = luku5 + luku7;
           if(luku5>=luku6) {
               luku6 = luku6 * 10;
               luku7 = luku7 * 10;
               luku8++;
           } 
       }   
    }
    
}
