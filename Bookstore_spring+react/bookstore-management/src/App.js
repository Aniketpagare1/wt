// src/App.js
import React, { useState } from 'react';
import './App.css';
import BookList from './components/BookList';
import BookForm from './components/BookForm';

function App() {
  const [books, setBooks] = useState([
    { title: 'The Great Gatsby', author: 'F. Scott Fitzgerald' },
    { title: 'To Kill a Mockingbird', author: 'Harper Lee' },
  ]);

  const addBook = (book) => {
    setBooks([...books, book]);
  };

  const deleteBook = (index) => {
    const newBooks = books.filter((_, i) => i !== index);
    setBooks(newBooks);
  };

  const updateBook = (index, updatedBook) => {
    const newBooks = books.map((book, i) => (i === index ? updatedBook : book));
    setBooks(newBooks);
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1>Bookstore Management</h1>
      </header>
      <BookForm addBook={addBook} />
      <BookList books={books} deleteBook={deleteBook} updateBook={updateBook} />
    </div>
  );
}

export default App;
