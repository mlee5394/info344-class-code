package main

import (
	"fmt"
	"encoding/csv"
	"os"
	"io"
	"log"
)

type zipcodes struct {
	total int
	npt int
	highestpop int
}

func main() {
	file, err := os.Open("zipcodedb.csv")
	if err != nil {
		log.Fatal(err)
	}
	r := csv.NewReader(file)
	
	for {
		record, err := r.Read()
		if err == io.EOF {
			break
		}
		if err != nil {
			log.Fatal(err)
		}
		fmt.Println(record[0])
	}
	
	file.Close()
}