package main

import (
	"fmt"
	"net/http"
	"time"
	"sync"
)

type MyStruct struct {
	value int
	mx sync.RWMutex
}

//  * is a receiver this function is callable through the structure
// via the value m
func (m *MyStruct) SetValue(val int) {
	m.mx.Lock()
	m.value = val
	m.mx.Unlock()
}

func (m *MyStruct) GetValue() int {
	m.mx.RLock()
	defer m.mx.RUnlock()
	return m.value
}

var _mystruct MyStruct

func loadMyStruct() {
	// simulate a long loading process
	time.Sleep(5 * time.Second)
	_mystruct.SetValue(5)
}

// http always returns two things, the responsewriter and the request
func getValue(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte(fmt.Sprint("value is ", _mystruct.GetValue())))
}

func main() {
	go loadMyStruct()
	
	http.HandleFunc("/", getValue)
	http.ListenAndServe(":9000", nil)
}