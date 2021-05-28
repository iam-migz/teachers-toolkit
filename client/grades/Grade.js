function calculateGrade (stud, crd) {
    
    let written_scores = [stud.w1, stud.w2, stud.w3, stud.w4, stud.w5, stud.w6, stud.w7, stud.w8, stud.w9, stud.w10];
    let performance_scores = [stud.p1, stud.p2, stud.p3, stud.p4, stud.p5, stud.p6, stud.p7, stud.p8, stud.p9, stud.p10];
    let quarterly_score = Number(stud.q1);

    // values in db come in as string so convert it to number
    written_scores = written_scores.map((i) => Number(i));
    performance_scores = performance_scores.map((i) => Number(i));
    for (let key in crd) {
        crd[key] = Number(crd[key]);
    }

  

    const written_total = written_scores.reduce((a,b) => a + b);
    const written_PS =  crd.total_highest_written ? (written_total/crd.total_highest_written) * 100 : 0;
    const written_WS = written_PS * (crd.written_weight / 100);

    const performance_total = performance_scores.reduce((a,b) => a + b);
    const performance_PS =  crd.total_highest_performance ? (performance_total/crd.total_highest_performance) * 100 : 0;
    const performance_WS = performance_PS * (crd.written_weight / 100);

    const quarterly_PS = crd.hq1 ? (quarterly_score/crd.hq1) * 100 : 0;
    const quarterly_WS = quarterly_PS * (crd.quarterly_weight/100);

    const initial_grade = written_WS + performance_WS + quarterly_WS;
    const final = transmutation_table(initial_grade);

    const grade = {
        written_total,
        written_PS,
        written_WS,
        performance_total,
        performance_PS,
        performance_WS,
        quarterly_PS,
        quarterly_WS,
        initial_grade,
        final
    }
    return grade;

}


function transmutation_table(initial_grade){
    let transmuted_grade;
    if(initial_grade >= 100){
    transmuted_grade = 100;
    } else if (initial_grade <= 99.99 && initial_grade >= 98.40){
        transmuted_grade = 99;
    }  else if (initial_grade <= 98.39 && initial_grade >= 96.80){
        transmuted_grade = 98;
    }  else if (initial_grade <= 96.79 && initial_grade >= 95.20){
        transmuted_grade = 97;
    }  else if (initial_grade <= 95.19 && initial_grade >= 93.60){
        transmuted_grade = 96;
    }  else if (initial_grade <= 93.59 && initial_grade >= 92.00){
        transmuted_grade = 95;
    }  else if (initial_grade <= 91.99 && initial_grade >= 90.40){
        transmuted_grade = 94;
    } else if (initial_grade <= 90.39 && initial_grade >= 88.80){
        transmuted_grade = 93;
    } else if (initial_grade <= 88.79 && initial_grade >= 87.20){
        transmuted_grade = 92;
    } else if (initial_grade <= 87.19 && initial_grade >= 85.60){
        transmuted_grade = 91;
    } else if (initial_grade <= 85.59 && initial_grade >= 84.00){
        transmuted_grade = 90;
    } else if (initial_grade <= 83.99 && initial_grade >= 82.40){
        transmuted_grade = 89;
    } else if (initial_grade <= 82.39 && initial_grade >= 80.80){
        transmuted_grade = 88;
    } else if (initial_grade <= 80.79 && initial_grade >= 79.20){
        transmuted_grade = 87;
    } else if (initial_grade <= 79.19 && initial_grade >= 77.60){
        transmuted_grade = 86;
    } else if (initial_grade <= 77.59 && initial_grade >= 76.00){
        transmuted_grade = 85;
    } else if (initial_grade <= 75.99 && initial_grade >= 74.40){
        transmuted_grade = 84;
    } else if (initial_grade <= 74.39 && initial_grade >= 72.80){
        transmuted_grade = 83;
    } else if (initial_grade <= 72.79 && initial_grade > 71.20){
        transmuted_grade = 82;
    } else if (initial_grade <= 71.19 && initial_grade >= 69.60){
        transmuted_grade = 81;
    } else if (initial_grade <= 69.59 && initial_grade >= 68.00){
        transmuted_grade = 80;
    } else if (initial_grade <= 67.99 && initial_grade >= 66.40){
        transmuted_grade = 79;
    } else if (initial_grade <= 66.39 && initial_grade >= 64.80){
        transmuted_grade = 78;
    } else if (initial_grade <= 64.79 && initial_grade >= 63.20){
        transmuted_grade = 77;
    } else if (initial_grade <= 63.19 && initial_grade >= 61.60){
        transmuted_grade = 76;
    } else if (initial_grade <= 61.59 && initial_grade >= 60.00){
        transmuted_grade = 75;
    } else if (initial_grade <= 59.99 && initial_grade >= 56.00){
        transmuted_grade = 74;
    } else if (initial_grade <= 55.99 && initial_grade >= 52.00){
        transmuted_grade = 73;
    } else if (initial_grade <= 51.99 && initial_grade >= 48.00){
        transmuted_grade = 72;
    } else if (initial_grade <= 47.99 && initial_grade >= 44.00){
        transmuted_grade = 71;
    } else if (initial_grade <= 43.99 && initial_grade >= 40.00){
        transmuted_grade = 70;
    } else if (initial_grade <= 39.99 && initial_grade >= 36.00){
        transmuted_grade = 69;
    } else if (initial_grade <= 35.99 && initial_grade >= 32.00){
        transmuted_grade = 68;
    } else if (initial_grade <= 31.99 && initial_grade >= 28.00){
        transmuted_grade = 67;
    } else if (initial_grade <= 27.99 && initial_grade >= 24.00){
        transmuted_grade = 66;
    } else if (initial_grade <= 23.99 && initial_grade >= 16.00){
        transmuted_grade = 65;
    } else if (initial_grade <= 19.99 && initial_grade >= 20.00){
        transmuted_grade = 64;
    } else if (initial_grade <= 15.99 && initial_grade >= 12.00){
        transmuted_grade = 63;
    } else if (initial_grade <= 11.99 && initial_grade >= 8.00){
        transmuted_grade = 62;
    } else if (initial_grade <= 7.99 && initial_grade >= 4.00){
        transmuted_grade = 61;
    } else if (initial_grade <= 3.99 && initial_grade >= 0){
	transmuted_grade = 60;
	} 
	return transmuted_grade;
}