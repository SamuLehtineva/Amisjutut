/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkgabstract;

import java.util.ArrayList;
import java.util.Random;

/**
 *
 * @author samu.lehtineva
 */
public class Lottoluokka extends Lottorunko {
    private ArrayList<Integer> numbers;
    private Random random = new Random();
    
    @Override
    public void arvonta() {
        this.numbers = new ArrayList<Integer>();
        this.teeNumerot();
    }

    @Override
    public ArrayList numerot() {
        return this.numbers;
    }

    @Override
    public void teeNumerot() {
        this.numbers = new ArrayList<Integer>();
        int i = 0;
        int newNum = 0;
        while (i < 7) {
            newNum = this.random.nextInt(39) + 1;
            if (!sisaltaaNumeron(newNum)) {
                this.numbers.add(newNum);
                i++;
            }
        }
    }

    @Override
    public boolean sisaltaaNumeron(int number) {
        return this.numbers.contains(number);
    }

    @Override
    public String omaTulos() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
