## COMO INSTALAR ESTE PROJETO (UBUNTU LTS 20.04 +)

1. ***INTALAÇÃO DO DOCKER***
    ```
    sudo apt-get update
    sudo apt-get install ca-certificates curl gnupg
    sudo install -m 0755 -d /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
    sudo chmod a+r /etc/apt/keyrings/docker.gpg
    
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
      $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
      sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
    
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin docker-compose
    sudo usermod -aG docker $USER
    newgrp docker
    ```
2. ***INTALAÇÃO DO LANDO***
    ```
    wget https://files.lando.dev/installer/lando-x64-stable.deb
    sudo dpkg -i lando-x64-stable.deb
    ```

3. ***INICIANDO O PROJETO*** *(Executar na raiz do projeto)*
	    `lando start`
> PRONTO, AMBIENTE OK!

## CRIANDO UM NOVO SITE

1. ***CRIANDO O SITE*** *(Executar na raiz do projeto)*
   

	`lando site-create <nome do site>`
	***ou***
	`lando sc <nome do site>`
	    
	*SIGA AS ORIENTAÇÕES DO PROMPT, CONFIRA O ARQUIVO `lando.yml`, CASO O SITE NÃO ESTEJA NO PROXY, SIGA O PASSO A SEGUIR*

2. **PROXY MULTISITE** *(Executar na raiz do projeto)*

	Adicione a url do novo site no arquivo `.lando.yml` na raiz do seu projeto:
	````
	    .
	    .
	    .
	    proxy:
	        appserver:
	            - saeb.multisite.local
	            - setre.multisite.local
	            - <novosite>.multisite.local  #<--- Insira aqui
    ````
	    
> PRONTO, SITE OK!    

**UTILS**

https://docs.lando.dev/drupal/getting-started.html

https://drushcommands.com

https://www.drush.org/12.x/


# qintess/multisite