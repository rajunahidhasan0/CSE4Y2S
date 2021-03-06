#include <iostream>
#include <string>
#include <fstream>
using namespace std;

string PlaintextToCipher(string text)
{
    ifstream read_key;
    string key;

    read_key.open("EncryptKey.txt");

    if(read_key.is_open())
    {
        string line;

        // while(read_key)
        // {
        //     getline(read_key, line);
        // }

        getline(read_key, line);

        key = line;

        read_key.close();
    }

    int i,j;

    for(i = 0, j=0; i < text.size() && j < key.size(); i++, j++)
    {

        if ((text [i] >= 'A' && text[i] <= 'Z') || (text[i] >= 'a' && text[i] <= 'z'))
        {

            if (text [i] >= 'A' && text[i] <= 'Z')
            {

                int code = (int) (text[i] + key[j]);

                code = code - (int) 'A';


                while ((code - 26) >= 0)
                {
                    code = code - 26;
                }

                code = code + (int) 'A';

                text[i] = (char) code;
            }


            if (text[i] >= 'a' && text[i] <= 'z')
            {
                int code = (int) (text[i] + key[j]);

                code = code - (int) 'a';


                while ((code - 26) >= 0)
                {
                    code = code - 26;
                }

                code = code + (int) 'a';

                text[i] = (char) code;
            }

        }

    }

    key.erase(0, i);

    ofstream writeFile;

    writeFile.open("EncryptKey.txt");

    if (writeFile.is_open())
    {
        writeFile << key;

        writeFile.close();
    }
    else
    {
        cout << "can not open the file" << endl;
    }

    return text;
}


string CipherToPlaintext(string encrypt)
{
    ifstream read_key;
    string key;

    read_key.open("DecryptKey.txt");

    if(read_key.is_open())
    {
        string line;

        // while(read_key)
        // {
        //     getline(read_key, line);
        // }

        getline(read_key, line);

        key = line;

        read_key.close();
    }

    int i,j;

    for(i = 0, j=0; i < encrypt.size() && j < key.size(); i++, j++)
    {
        if ((encrypt [i] >= 'A' && encrypt[i] <= 'Z') || (encrypt[i] >= 'a' && encrypt[i] <= 'z'))
        {

            if (encrypt [i] >= 'A' && encrypt[i] <= 'Z')
            {
                int code = (int) (encrypt[i] - key[j]);

                code = code - (int) 'A';


                while (code < 0)
                {
                    code = code + 26;
                }

                code = code + (int) 'A';

                encrypt[i] = (char) code;
            }


            if (encrypt[i] >= 'a' && encrypt[i] <= 'z')
            {
                int code = (int) (encrypt[i] - key[j]);

                code = code - (int) 'a';


                while (code < 0)
                {
                    code = code + 26;
                }

                code = code + (int) 'a';

                encrypt[i] = (char) code;
            }
        }
    }

    key.erase(0, i);

    ofstream writeFile;

    writeFile.open("DecryptKey.txt");

    if (writeFile.is_open())
    {
        writeFile << key;

        writeFile.close();
    }
    else
    {
        cout << "can not open the file" << endl;
    }

    return encrypt;
}


int main()
{
    string text;

    cout << "Input your message" << endl;
    getline(cin, text);


    cout<<"Plain Text: "<< text << endl << endl;

    string encrypt = PlaintextToCipher(text);

    cout<<"Cipher: "<< encrypt << endl << endl;

    string decrypt = CipherToPlaintext(encrypt);

    cout<<"Plain Text: "<< decrypt <<endl;

    return 0;
}
