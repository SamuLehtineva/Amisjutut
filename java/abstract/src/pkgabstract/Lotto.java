/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkgabstract;

import java.util.ArrayList;

/**
 *
 * @author samu.lehtineva
 */
public class Lotto {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Lottoluokka lotteryNumbers = new Lottoluokka();
        lotteryNumbers.arvonta();
        ArrayList<Integer> numerot = lotteryNumbers.numerot();

        System.out.println("Lottery numbers:");
        for (int number : numerot) {
            System.out.print(number + " ");
        }
        System.out.println("");
        
        omalaskin laskin = new omalaskin();
        laskin.arvonta();
        ArrayList<Integer> omatNumerot = lotteryNumbers.numerot();
        
        int i = 0;
        String k = "";
        
        i = Integer.parseInt(k);
    }
    
}
